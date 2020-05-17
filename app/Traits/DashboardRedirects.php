<?php

namespace App\Traits;

trait DashboardRedirects{


    /**
     * redirect with route name, and success create message
     */
    public function redirectRouteWithSuccessStore($route = null, $params = null){

        $redirect = redirect()->back()->with('success', __('alerts.create'));

        $route = $route ? $route : $this->redirectRoute();

        if($route){
            $redirect = redirect()->route($route, $params)->with('success', __('alerts.create'));
        }

        return $redirect;
    }

    /**
     * redirect with route name, and success update message
     */
    public function redirectRouteWithSuccessUpdate($route = null, $params = null){

        $redirect = redirect()->back()->with('success', __('alerts.update'));

        $route = $route ? $route : $this->redirectRoute();

        if($route){
            $redirect = redirect()->route($route, $params)->with('success', __('alerts.update'));
        }

        return $redirect;
    }

    /**
     * redirect with route name, and success delete message
     */
    public function redirectRouteWithSuccessDelete($route = null, $params = null){

        $redirect = redirect()->back()->with('success', __('alerts.delete'));

        $route = $route ? $route : $this->redirectRoute();

        if($route){
            $redirect = redirect()->route($route, $params)->with('success', __('alerts.delete'));
        }

        return $redirect;
    }

    /**
     * redirect with route name, and error message
     */
    public function redirectRouteWithErrors($errors ,$route = null, $params = null){

        $redirect = redirect()->back()->withErrors($errors);

        $route = $route ? $route : $this->redirectRoute();

        if( $route ){
            $redirect = redirect()->route( $route , $params)->withErrors($errors);
        }

        return $redirect;
    }

    /**
     * redirect route
     */
    public function redirectRoute(){
        return property_exists($this, 'redirectRoute') ? $this->redirectRoute : null;
    }

}
