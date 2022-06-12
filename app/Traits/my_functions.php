<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

Trait my_functions
{
      public function storeThink($your_model,$your_request){
            $model = $your_model::create($your_request->all());
            if($model) return true;
   }

   public function deleteThink($your_model , $your_id)
   {
             $model = $your_model::find($your_id);
            if($model){
             $model->delete();
             return true;
            }
   }

   public function updateThink($your_model,$your_request , $your_id)
   {
            $model = $your_model::find($your_id);
            if($model){
             $model->update($your_request->all());
              return true;
            }
   }

}