<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Triats\apiresponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\postresoruce;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    use apiresponse;
    public function index(){
        $posts=postresoruce::collection( Post::paginate($this->paginateNumber));
            return $this->apiresponse($posts);
        }

        public function show($id){
            $post=new postresoruce( Post::find($id));
            if($post)
            return $this->apiresponse($post);

            return $this->notfound();

        }

        public function delete($id){
        $post= Post::find($id);
            if($post){
             $post->delete();
             return $this->apiresponse($post,null,200);
            }
             return $this->notfound();
        }


        public function store(Request $request){
            $validate=Validator::make($request->all(),[
                'titel'=>'required',
                'body'=>'required',
            ]);
            if($validate->fails())
            return $this->apiresponse(null ,' Error in validate',404);

            $post=new postresoruce(Post::create($request->all()));
            if($post)
            return $this->apiresponse($post ,null ,201);

            return $this->apiresponse(null ,'the post error',404);
        }

        public function update($id,Request $request){

            $validate=Validator::make($request->all(),[
                'titel'=>'required',
                'body'=>'required',
            ]);
            if($validate->fails())
            return $this->apiresponse(null ,' Error in validate',404);

            $post=new postresoruce( Post::find($id));
            if(!$post)
            return $this->notfound();

           new postresoruce($post->update($request->all()));
            if($post)
            return $this->apiresponse($post ,null ,201);

            return $this->apiresponse(null ,'the post error',404);

        }
}
