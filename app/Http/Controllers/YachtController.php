<?php

namespace App\Http\Controllers;

use App\Http\Requests\YachtRequest;
use App\Http\Resources\YachtResource;
use App\Models\Yacht;
use Illuminate\Http\Request;

class YachtController extends Controller
{
    //
    public function index(Request $request){
        $name=$request->input('name');
        $type=$request->input('type');
        $yachts=Yacht::query()
            ->when($name,fn($query)=>$query->where('name','like','%'.$name.'%'))
            ->when($type,fn($query)=>$query->where('type',$type))
            ->paginate();
        return YachtResource::collection($yachts);
    }

    public function store(YachtRequest $request){
        $yacht=Yacht::query()->create($request->validated());
        return YachtResource::make($yacht);
    }

    public function update(YachtRequest $request,Yacht $yacht)
    {
        $yacht->update($request->validated());
        return YachtResource::make($yacht);
    }

    public function destroy(Yacht $yacht){
        $yacht->delete();
    }
}
