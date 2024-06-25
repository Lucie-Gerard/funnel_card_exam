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

        return redirect('/decks');
    }


    public function cardStore(Request $request, int $id): RedirectResponse {
        $card = new Card;

        $card->recto_name = $request->get('recto_name');
        $card->verso_name = $request->get('verso_name');
        $card->deck_id    = $id;

        $card->save();

        return redirect()->route('card-listing', [$id]);
    }


    // DESTROY
    public function destroy(int $id) {
        Deck::destroy($id);
    }

}
