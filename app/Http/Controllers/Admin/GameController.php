<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use Illuminate\Http\Request;
use DataTables;
use Log;
class GameController extends Controller
{
    /**
     * Game Listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, Game $game)
    {
        if ($request->ajax()) {
            $current_user = $request->user();
            $data = Game::latest();
            if ($request->title != '') {
                $data->where('name', 'like', '%'.$request->title.'%');
            }

            return DataTables::of($data)
                    ->addColumn('action', function ($value) {
                        $editRoute = route('admin.game.add', ['game' => encrypt_param($value->id)]);
                        $deleteRoute = route('admin.game.delete', ['game' => encrypt_param($value->id)]);

                        $editButton = '<a class="btn btn-sm btn-warning" href="'.$editRoute.'">Edit</a>';
                        $deleteForm = '<form method="POST" action="'.$deleteRoute.'">
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                            </div>
                        </form>';

                        $buttons = $editButton.$deleteForm;

                        return $buttons;
                    })
                    ->addColumn('status', function ($row) {
                        return @$row->status == 1 ? 'Active' : 'InActive' ;
                    })
                    ->rawColumns(['action','addColumn'])
                    ->make(true);
        }
        if ($request->isMethod('GET')) {
            return view('admin.game.list');
        }
    }

    //Adding New Subjects
    public function add(Request $request, Game $game)
    {
        $data = [];
        $data['game'] = $game;

        return view('admin.game.add', $data);
    }

    //Storung Game Data
    public function store(GameRequest $request, Game $game)
    {
        try {
            Log::info('Game Add/Edit', ['game' => $game->toArray()]);

            $updatedGame = $game->updateOrCreate(
                ['id' => $game == null ? null : $game->id],
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'category' => $request->category,
                    'sub_category' => $request->sub_category,
                    'is_trending' => $request->is_trending,
                    'is_popular' => $request->is_popular,
                    'is_featured' => $request->is_featured,
                    'status' => $request->status,
                ]
            );
            if($request->hasFile('feature_image')){
                $updatedGame->feature_image = uploadFile($request->feature_image,'/game/');
            }
            $updatedGame->save();

            return redirect()->route('admin.game.list')
            ->with('msgClass', 'success')->with('message', 'Game created successfully');
        } catch (\Exception $e) {
            dd($e);
            Log::error('Game Add/Update', ['error' => $e->getMessage()]);

            return back()->with('message', 'Error Occured');
        }
    }


    public function delete(Request $request,Game $game)
    {
        try {
            $game->delete();
            Log::info('Question Deleted', ['game' => $game->toArray()]);

            return redirect()->route('admin.game.list')->with('message', 'Question Deleted Successfully');
        } catch (\Exception $e) {
            Log::error('Question Delete Error', ['game' => $game->toArray()]);

            return back()->with('message', 'Error Occured');
        }
    }
}
