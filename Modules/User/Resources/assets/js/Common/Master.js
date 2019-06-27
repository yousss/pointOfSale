import React, {Component} from 'react';
import { Route, Link, Switch  } from 'react-router-dom'
import UserList from './../User/UserList'

class  Master extends Component  {
  
  constructor(props){
    super(props)
  }

  render() {
    return (
      <div className="container-fluid">
        <nav className="navbar navbar-default">
          <div className="container-fluid">
            <div className="navbar-header">
              <a className="navbar-brand" href="#">AppDividend</a>
            </div>
            <ul className="nav navbar-nav">
              <li className="active"><Link to="/master/users" >Home</Link></li>
              <li><a href="#">Page 1</a></li>
              <li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
          </div>
      </nav>
          <Switch>
            <Switch>
              <UserList />
            </Switch>
            <Route path="/master/users" component={UserList} />
          </Switch>
          <div>
            {this.props.children}
          </div>
      </div>
    )
  }
}
export default Master;
