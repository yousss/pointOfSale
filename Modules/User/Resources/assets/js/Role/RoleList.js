import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router'


class RoleList extends Component {
    constructor () {
        super()
        this.state = {
            roles: []
        }
    }

    componentDidMount () {
    axios.get('/api/admin/roles').then(response => {
        this.setState({
            roles: response.data
        })
    })
    }

    render () {
    const { roles } = this.state
    return (
        <div className='container py-4'>
        <div className='row justify-content-center'>
            <div className='col-md-12'>
            <div className='card'>
                <div className='card-header'>All Roles</div>
                <div className='card-body'>
                    <div>
                        <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                            Create new role
                        </Link>
                        
                        <div className='row'>
                            <div className='col-md-1'>#</div>
                            <div className='col-md-2'>Name</div>
                            <div className='col-md-3'>Display Name</div>
                            <div className='col-md-4'>Description</div>
                            <div className='col-md-2'>Action</div>
                        </div>
                    </div>
                    {roles.map(role => (
                        <div className='row'>
                            <div className='col-md-1'> {role.id}</div>
                            <div className='col-md-2'> {role.name} </div>
                            <div className='col-md-2'> {role.display_name} </div>
                            <div className='col-md-2'> {role.description} </div>
                            <div className='col-md-2'>
                                <Link className='' to={ `edit/${role.id}`} key={role.id}>Edit</Link>
                                <Link className='' to={ `delete/${role.id}`} key={role.id}>Delete</Link>
                            </div>
                        </div>
                    ))}
                    
                </div>
            </div>
            </div>
        </div>
        </div>
    )
    }
}

export default RoleList
