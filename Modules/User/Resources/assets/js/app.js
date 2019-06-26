import React, { Component,Suspense } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter as Router, Switch } from 'react-router-dom';
import UserRouter from './UserRouter'

export default class AppUser extends Component {

    render() {
        return (
            <Router>
                <UserRouter/>
            </Router>
        )
    }
}