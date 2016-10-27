<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_name','user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function  getCarsFromMultipleParms($car_name,$user_id){
    
        $car = self::select('*');
        
        if(isset($car_name)){
                $car->where('car_name',$car_name);
        
        }
        if(isset($user_id)){
                $car->where('user_id',$user_id);
        
        }
        
        
      return  $car->get();
    
    }
    
}
