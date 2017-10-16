<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/16/2017
 * Time: 9:42 PM
 */

namespace app\Filters;


use Illuminate\Http\Request;

abstract class Filters {

    protected $request, $builder;

    protected $filters = [];

    public function __construct(Request $request) {

        $this->request = $request;
    }

    public function apply($builder) {

        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;

    }

    /**
     * @return array
     */
    public function getFilters() {

        return $this->request->intersect($this->filters);
    }
}