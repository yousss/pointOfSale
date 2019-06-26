import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom'
import UserList from './User/UserList'
import Master from './Common/Master'

class UserRouter extends Component {
    render(){
        return (
            <div>
                <Route path="/master" component={Master} />
                <Route  path="/master/users" component={UserList} />
            </div>
        )
    }
}

export default UserRouter;