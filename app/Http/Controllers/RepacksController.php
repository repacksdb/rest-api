<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repack;

class RepacksController extends Controller
{
    public function index()
    {
        try {
            $repacks = Repack::orderBy('published_date', 'desc')->paginate(24);
            return response()->json($repacks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $repack = Repack::find($id);
            if (!$repack) {
                return response()->json(['error' => 'Repack not found'], 404);
            } else {
                return response()->json($repack);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request, $title)
    {
        try {
            $query = $title;
            $repacks = Repack::where('title', 'like', "%$query%")->paginate(24);
            $data = $repacks->toArray()['data'];
            if (!$data) {
                return response()->json(['error' => 'No repacks with title "' . $query . '" found.'], 404);
            } else {
                return response()->json($repacks);
            }
            return response()->json($repacks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function genre(Request $request, $genre)
    {
        try {
            $query = $genre;
            $repacks = Repack::where('genre_tags', 'like', "%$query%")->orderBy('published_date', 'desc')->paginate(24);
            $data = $repacks->toArray()['data'];
            if (!$data) {
                return response()->json(['error' => 'No repacks with genre "' . $query . '" found.'], 404);
            } else {
                return response()->json($repacks);
            }
            return response()->json($repacks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function language(Request $request, $language)
    {
        try {
            $query = $language;
            $repacks = Repack::where('languages', 'like', "%$query%")->orderBy('published_date', 'desc')->paginate(24);
            $data = $repacks->toArray()['data'];
            if (!$data) {
                return response()->json(['error' => 'No repacks with language "' . $query . '" found.'], 404);
            } else {
                return response()->json($repacks);
            }
            return response()->json($repacks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function repacker(Request $request, $repacker)
    {
        try {
            $query = $repacker;
            $repacks = Repack::where('website', 'like', "%$query%")->orderBy('published_date', 'desc')->paginate(24);
            $data = $repacks->toArray()['data'];
            if (!$data) {
                return response()->json(['error' => 'No repacks by "' . $query . '" found.'], 404);
            } else {
                return response()->json($repacks);
            }
            return response()->json($repacks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Advanced search
    public function advancedSearch(Request $request)
    {
        try {
            $query = Repack::query();

            $searchFields = [
                'title' => 'title',
                'genre' => 'genre_tags',
                'language' => 'languages',
                'repacker' => 'website',
                'features' => 'features',
                'description' => 'description'
            ];

            foreach ($searchFields as $field => $column) {
                if ($request->has($field)) {
                    $query->where($column, 'like', '%' . $request->input($field) . '%');
                }
            }

            $sortableFields = [
                'order_title' => 'title',
                'published_date' => 'published_date'
            ];

            foreach ($sortableFields as $field => $column) {
                if ($request->has($field)) {
                    $query->orderBy($column, $request->input($field));
                }
            }

            $results = $query->paginate(24);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
