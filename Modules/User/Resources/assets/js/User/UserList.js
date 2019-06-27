import React, {Component} from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import TableRow from './../Common/TableRow';

class UserList extends Component {
  constructor(props) {
       super(props);
       this.state = {items: ''};
     }
     componentDidMount(){
       axios.get('/api/admin/users')
       .then(response => {
         this.setState({ items: response.data.data });
       })
       .catch(function (error) {
         console.log(error);
       })
     }
     tabRow(){
       if(this.state.items instanceof Array){
         return this.state.items.map(function(object, i){
             return <TableRow obj={object} key={i} />;
         })
       }
     }

  render(){
    return (
      <div>
        <h1>List of user</h1>
        <div className="row">
          <div className="col-md-10"></div>
          <div className="col-md-2">
            <Link to="/add-item">Create User</Link>
          </div>
        </div><br />
        <table className="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
              {this.tabRow()}
            </tbody>
        </table>
    </div>
    )
  }
}
export default UserList;