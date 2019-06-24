import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Router, Route, browserHistory } from 'react-router';
import Header from './../Common/Header'
import RoleList from './RoleList'
import RoleCreate from './RoleCreate'
import RoleEdit from './RoleEdit'

class Role extends Component {
    render () {
        return (
            <Router history={browserHistory}>
                <Route path="/" component={Header} ></Route>
                <Route path="/roles" component={RoleList} >
                    <Route path="/create" component={RoleCreate} />
                    {/* <Route path="/delete/:id" component={RoleEdit} /> */}
                    <Route path="/edit/:id" component={RoleEdit} />
                </Route>
            </Router>
        )
    }
}

export default Role

ReactDOM.render(<Role />, document.getElementById('app'))