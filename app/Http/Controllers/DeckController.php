<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DeckController extends Controller
{
    // INDEX

    /**
     * index
     *
     * @return array
     */
    public function index() {
        $decks = Deck::orderBy('name')->get();
        $categories = Category::all();

        return response()->json([
            'decks' => $decks,
            'categories' => $categories
        ]);
    }


    // SHOW

    /**
     * show
     *
     * @param integer $id
     *
     * @return array
     */
    public function show(int $id) {
        $cards = Card::where('deck_id', $id)->orderBy('recto_name')->get();
        $deck = Deck::find($id);

        return response()->json([
            'cards' => $cards,
            'deck' => $deck
        ]);
    }

    /**
     * cardShow
     *
     * @param integer $deck_id
     * @param integer $card_id
     *
     * @return array
     */
    public function cardShow(int $deck_id, int $card_id) {
        $card = Card::find($card_id);
        $deck = Deck::find($deck_id);

        return response()->json([
            'card' => $card,
            'deck' => $deck
        ]);
    }


    // INSERT

    /**
     * deckStore
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deckStore(Request $request): RedirectResponse {
        $deck = new Deck;

        $deck->name        = $request->get('name');
        $deck->user_id     = 1;
        $deck->category_id = $request->get('category_id');

        $deck->save();

        return redirect()->route('home');
    }

    /**
     * cardStore
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardStore(Request $request, int $id): RedirectResponse {
        $card = new Card;

        $card->recto_name = $request->get('recto_name');
        $card->verso_name = $request->get('verso_name');
        $card->deck_id    = $id;

        $card->save();

        return redirect()->route('card-listing', [$id]);
    }


    // UPDATE
    /**
     * updateDeck
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateDeck(Request $request, int $id): RedirectResponse {
        $deck = Deck::find($id);

        $deck->name = $request->get('name');

        $deck->update();

        return redirect()->route('card-listing', [$id]);
    }

    public function updateCard(Request $request, int $deck_id, int $card_id): RedirectResponse {
        $card = Card::find($card_id);

        $card->recto_name = $request->get('recto_name');
        $card->verso_name = $request->get('verso_name');

        $card->update();

        return redirect()->route('card-listing', [$deck_id]);
    }


    // DESTROY

    /**
     * destroyDeck
     *
     * @param integer $id
     *
     * @return void
     */
    public function destroyDeck(int $id) {
        Deck::destroy($id);
    }

    /**
     * destroyCard
     *
     * @param integer $id
     *
     * @return void
     */
    public function destroyCard(int $id) {
        Card::destroy($id);
    }

}
