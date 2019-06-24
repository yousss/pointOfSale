import axios from 'axios'
import React, { Component } from 'react'

class RoleEdit extends Component {
    constructor (props) {
    super(props)
    this.state = {
        name: '',
        display_name: '',
        description: '',
        errors: []
    }
    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleCreateRoleEdit = this.handleCreateRoleEdit.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
    }

    handleFieldChange (event) {
    this.setState({
        [event.target.name]: event.target.value
    })
    }

    handleCreateRoleEdit (event) {
        event.preventDefault()

        const { history } = this.props

        const role = {
            name: this.state.name,
            display_name: this.state.display_name,
            description: this.state.description
        }

        axios.put('/api/admin/roles/'+this.props.params.id, role)
            .then(response => {
            // redirect to the homepage
                history.push('/')
            })
            .catch(error => {
                this.setState({
                    errors: error.response.data.errors
                })
            })
    }

    hasErrorFor (field) {
        return !!this.state.errors[field]
    }

    renderErrorFor (field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
                    <strong>{this.state.errors[field][0]}</strong>
                </span>
            )
        }
    }

    render () {
    return (
        <div className='container py-4'>
        <div className='row justify-content-center'>
            <div className='col-md-12'>
            <div className='card'>
                <div className='card-header'>Create new role</div>
                <div className='card-body'>
                <form onSubmit={this.handleCreateRoleEdit}>
                    <div className='form-group'>
                        <label htmlFor='name'>Name</label>
                        <input
                            id='name'
                            type='text'
                            className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                            name='name'
                            value={this.state.name}
                            onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('name')}
                    </div>
                    <div className='form-group'>
                        <label htmlFor='display_name'>Display Name</label>
                        <input
                            id='display_name'
                            type='text'
                            className={`form-control ${this.hasErrorFor('display_name') ? 'is-invalid' : ''}`}
                            name='display_name'
                            value={this.state.display_name}
                            onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('display_name')}
                    </div>
                    <div className='form-group'>
                        <label htmlFor='description'>Description</label>
                        <textarea
                            id='description'
                            className={`form-control ${this.hasErrorFor('description') ? 'is-invalid' : ''}`}
                            name='description'
                            rows='10'
                            value={this.state.description}
                            onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('description')}
                    </div>
                    <button className='btn btn-primary'>Edit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    )
    }
}

export default RoleEdit
