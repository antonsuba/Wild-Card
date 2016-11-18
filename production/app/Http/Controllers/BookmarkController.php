<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BookmarkController extends Controller
{
    /**
    *Handling Bookmarks
    */

    public function saveBookmark($suggestionID){
        $sug = Preference_Suggestion::where('suggestion_id', $suggestionID);
        $sug_id = $sug->suggestion_id;

        $pref = Preference::find($sug->preference_id);
        $cat_id = $pref->category_id;

        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        $bookmark->category_id = $cat_id;
        $bookmark->save();
    }

    public function removeBookmark($bookmarkID){
        $bookmark = Bookmark::find($bookmarkID);
        $bookmark->delete();
    }
}