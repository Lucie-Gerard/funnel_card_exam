<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeckController extends Controller
{
    public function index() {
        $decks = Deck::all();
        $categories = Category::all();

        return response()->json([
            'decks' => $decks,
            'categories' => $categories
        ]);
    }

    public function show(int $id) {
        $cards = Card::where('deck_id', $id)->get();
        $deck = Deck::find($id);

        return response()->json([
            'cards' => $cards,
            'deck' => $deck
        ]);
    }

    public function cardShow(int $deck_id, int $card_id) {
        $card = Card::find($card_id);
        $deck = Deck::find($deck_id);

        return response()->json([
            'card' => $card,
            'deck' => $deck
        ]);
    }
}
