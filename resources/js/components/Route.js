import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom'
import Login from './Login'
import Register from './Register'
import LoginScreen from './Loginscreen'
import AppUser from './../../../Modules/User/Resources/assets/js/app'

const routing = () => {
    return(
        <Switch>
                <Route exact path="/" component={LoginScreen} />
                <Route  path="/login" component={Login} />
                <Route  path="/register" component={Register} />
                <AppUser/>
        </Switch>
    )
}
export default routing;