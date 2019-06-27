import React, { Component,Suspense } from 'react'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Master from './Common/Master'

export default class AppUser extends Component {

    render() {
        return (
            <Router>
                <Switch>
                    <Route path="/master" component={Master} />
                </Switch>
            </Router>
        )
    }
}