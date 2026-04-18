@extends('layouts.app')

@section('title', 'Study Mode — FlashLearn')

@section('content')
<style>
    .study-container {
        max-width: 720px;
        margin: 0 auto;
    }

    .study-controls-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .study-counter {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .study-counter strong {
        color: var(--text-primary);
    }

    /* ===== Flashcard Flip ===== */
    .flashcard-scene {
        perspective: 1000px;
        width: 100%;
        height: 320px;
        margin-bottom: 1.25rem;
        cursor: pointer;
    }

    .flashcard-flipper {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease;
        transform-style: preserve-3d;
    }

    .flashcard-flipper.flipped {
        transform: rotateY(180deg);
    }

    .flashcard-face {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        border-radius: var(--radius);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        text-align: center;
        overflow-y: auto;
    }

    .flashcard-front {
        background: var(--bg-card);
        border: 1px solid var(--border-default);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .flashcard-back {
        background: #f0fdfa;
        border: 1px solid #ccfbf1;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transform: rotateY(180deg);
    }

    .flashcard-face .face-label {
        position: absolute;
        top: 1rem;
        left: 1.25rem;
        font-size: 0.6875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-secondary);
    }

    .flashcard-face .face-category {
        position: absolute;
        top: 1rem;
        right: 1.25rem;
    }

    .flashcard-face .face-content {
        font-size: 1.125rem;
        font-weight: 500;
        line-height: 1.6;
        max-width: 100%;
        word-wrap: break-word;
        white-space: pre-wrap;
        color: var(--text-primary);
    }

    .flashcard-back .face-content {
        color: #0d9488;
    }

    .flashcard-face .flip-hint {
        position: absolute;
        bottom: 1rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    /* ===== Nav ===== */
    .study-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .study-nav .btn {
        min-width: 100px;
        justify-content: center;
    }

    .study-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    /* ===== Progress ===== */
    .progress-bar-track {
        width: 100%;
        height: 3px;
        background: var(--border-default);
        border-radius: 3px;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .progress-bar-fill {
        height: 100%;
        background: var(--btn-primary-bg);
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .learned-btn.is-learned {
        background: var(--green-50) !important;
        color: var(--green-600) !important;
        border-color: var(--green-500) !important;
    }
</style>

<div class="study-container">
    <div class="page-header">
        <h1>Study Mode</h1>
    </div>

    {{-- Category filter --}}
    <div class="card mb-2" style="padding: 0.5rem 1rem;">
        <form method="GET" action="{{ route('flashcards.study') }}" class="flex flex-gap flex-wrap" style="align-items: center;" id="study-filter-form">
            <label class="form-label" style="margin: 0; white-space: nowrap;">Category:</label>
            <select name="category_id" class="form-control" id="study-category-select" style="padding: 5px 10px; flex: 1;"
                    onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <label style="display: flex; align-items: center; gap: 6px; font-size: 0.8125rem; cursor: pointer; white-space: nowrap; margin: 0;">
                <input type="checkbox" name="unlearned_only" value="1"
                       {{ request('unlearned_only') ? 'checked' : '' }}
                       onchange="this.form.submit()"
                       style="cursor: pointer;">
                Only unlearned
            </label>
        </form>
    </div>

    @if($flashcards->count() > 0)
        <div class="progress-bar-track">
            <div class="progress-bar-fill" id="progressBar" style="width: 0%"></div>
        </div>

        <div class="study-controls-top">
            <div class="study-counter">
                Card <strong id="currentIndex">1</strong> / <strong>{{ $flashcards->count() }}</strong>
            </div>
            <button class="btn btn-secondary btn-sm" id="btn-shuffle" onclick="shuffleCards()">Shuffle</button>
        </div>

        <div class="flashcard-scene" onclick="flipCard()" id="flashcard-scene">
            <div class="flashcard-flipper" id="flashcardFlipper">
                <div class="flashcard-face flashcard-front">
                    <span class="face-label">Question</span>
                    <span class="face-category badge badge-category" id="cardCategory"></span>
                    <div class="face-content" id="cardQuestion"></div>
                    <span class="flip-hint">Click to reveal answer</span>
                </div>
                <div class="flashcard-face flashcard-back">
                    <span class="face-label">Answer</span>
                    <div class="face-content" id="cardAnswer"></div>
                    <span class="flip-hint">Click to flip back</span>
                </div>
            </div>
        </div>

        <div class="study-nav">
            <button class="btn btn-secondary" id="btn-prev" onclick="prevCard()">Previous</button>
            <button class="btn btn-primary" id="btn-next" onclick="nextCard()">Next</button>
        </div>

        <div class="study-actions">
            <button class="btn btn-success btn-sm learned-btn" id="btn-toggle-learned" onclick="toggleLearned()">
                Mark as Learned
            </button>
        </div>

    @else
        <div class="empty-state">
            <h3>No flashcards to study</h3>
            <p>
                @if(request('category_id'))
                    No flashcards found in this category.
                @else
                    Create some flashcards first to start studying.
                @endif
            </p>
            <a href="{{ route('flashcards.create') }}" class="btn btn-primary">Create Flashcard</a>
        </div>
    @endif

    <div class="text-center mt-2">
        <a href="{{ route('flashcards.index') }}" class="btn btn-secondary btn-sm">Back to Flashcards</a>
    </div>
</div>
@endsection

@section('scripts')
@if($flashcards->count() > 0)
<script>
    let cards = @json($cardsJson);
    let currentIndex = 0;
    let isFlipped = false;

    function renderCard() {
        const card = cards[currentIndex];
        document.getElementById('cardQuestion').textContent = card.question;
        document.getElementById('cardAnswer').textContent = card.answer;
        document.getElementById('cardCategory').textContent = card.category;
        document.getElementById('currentIndex').textContent = currentIndex + 1;

        isFlipped = false;
        document.getElementById('flashcardFlipper').classList.remove('flipped');

        const progress = ((currentIndex + 1) / cards.length) * 100;
        document.getElementById('progressBar').style.width = progress + '%';

        updateLearnedButton(card.is_learned);

        document.getElementById('btn-prev').disabled = (currentIndex === 0);
        document.getElementById('btn-prev').style.opacity = (currentIndex === 0) ? '0.4' : '1';
        document.getElementById('btn-next').disabled = (currentIndex === cards.length - 1);
        document.getElementById('btn-next').style.opacity = (currentIndex === cards.length - 1) ? '0.4' : '1';
    }

    function flipCard() {
        isFlipped = !isFlipped;
        document.getElementById('flashcardFlipper').classList.toggle('flipped');
    }

    function nextCard() {
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            renderCard();
        }
    }

    function prevCard() {
        if (currentIndex > 0) {
            currentIndex--;
            renderCard();
        }
    }

    function shuffleCards() {
        for (let i = cards.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [cards[i], cards[j]] = [cards[j], cards[i]];
        }
        currentIndex = 0;
        renderCard();
    }

    function updateLearnedButton(isLearned) {
        const btn = document.getElementById('btn-toggle-learned');
        if (isLearned) {
            btn.textContent = 'Learned';
            btn.classList.add('is-learned');
        } else {
            btn.textContent = 'Mark as Learned';
            btn.classList.remove('is-learned');
        }
    }

    function toggleLearned() {
        const card = cards[currentIndex];
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/flashcards/' + card.id + '/toggle-learned', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.success) {
                card.is_learned = data.is_learned;
                updateLearnedButton(data.is_learned);
            }
        })
        .catch(function(err) { console.error('Error:', err); });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') nextCard();
        if (e.key === 'ArrowLeft') prevCard();
        if (e.key === ' ' || e.key === 'Enter') {
            e.preventDefault();
            flipCard();
        }
    });

    renderCard();
</script>
@endif
@endsection
