import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import {withRouter} from 'react-router-dom'


class Login extends Component {
    constructor(props){
    super(props);
    this.state={
        username:'',
        password:''
        }
    }

    handleClick(event){
        const apiBaseUrl = "/api/login";
        var self = this;
        var payload={
            "email":this.state.username,
            "password":this.state.password
        }
        axios.post(apiBaseUrl, payload)
        .then(function (response) {
            if( response.status == 200 ){
                axios.defaults.headers.common['Authorization'] = 'Bearer '+response.data.data.token;
                self.props.history.push('/master')
            }
            else if( response.status == 204 ){
                console.log("Username password do not match");
                alert("username password do not match")
            }
            else{
                console.log("Username does not exists");
                alert("Username does not exist");
            }
        })
        .catch(function (error) {
        console.log(error);
        });
    }

    render() {
        return (
        <div className='col-md-12'>
            <MuiThemeProvider>
                <div>
                    <AppBar title="Login"/>
                    <div className='row'>
                        <div className='col-md-4 offset-md-4'>
                            <TextField
                            hintText="Enter your Username"
                            floatingLabelText="Username"
                            onChange = {(event,newValue) => this.setState({username:newValue})}
                            />
                            <br/>
                            <TextField
                            type="password"
                            hintText="Enter your Password"
                            floatingLabelText="Password"
                            onChange = {(event,newValue) => this.setState({password:newValue})}
                            />
                            <br/>
                            <RaisedButton label="Submit" primary={true} style={style} onClick={(event) => this.handleClick(event)}/>
                        </div>
                    </div>
                </div>
            </MuiThemeProvider>
        </div>
        );
    }
}

const style = {
 margin: 15,
};

export default withRouter(Login);
