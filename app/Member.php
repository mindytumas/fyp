<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Member extends Model
{
    use Sortable;


    protected $fillable = ['name', 'memberNo', 'nric', 'registerDate', 'occupation', 'address', 'phoneNo',  'paymentstatus','yearOfBorn']; 
    
    protected $table ='members';
    
    protected $dates = ['expiredDate', 'registerDate', 'today', 'newexpiredDate', '$newregisterDate'];

    public $sortable = ['i','name', 'memberNo', 'nric', 'registerDate', 'occupation', 'address', 'phoneNo',  'paymentstatus','yearOfBorn','memberstatus'];
}
