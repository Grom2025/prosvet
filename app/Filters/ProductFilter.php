<?php

namespace App\Filters;

class ProductFilter extends QueryFilter{
    public function group_rents_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('group_rents_id', $id);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$search_string.'%')
            ->orWhere('fexp', 'LIKE', '%'.$search_string.'%');
    }

    public function product_group_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('product_group_id', $id);
        });
    }
}
