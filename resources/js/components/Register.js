import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import {withRouter} from 'react-router-dom'
import axios from 'axios';

class Register extends Component {
  constructor(props){
    super(props);
    this.state={
      name:'',
      email:'',
      password:''
    }
  }

  handleClick(event){
        var apiBaseUrl = "/api/";
        console.log("values",this.state.name,this.state.email,this.state.password);
        //To be done:check for empty values before hitting submit
        var self = this;
        let payload={
            "name": this.state.name,
            "email":this.state.email,
            "password":this.state.password
        }
        axios.post(apiBaseUrl+'/register', payload)
    .then(function (response) {
        console.log(response);
        if(response.status == 200){
            console.log("registration successfull");
            self.props.history.push('/home')        
        }
    }).catch(function (error) {
        console.log(error);
   });
}

  render() {
    return (
      <div className='col-md-12'>
        <MuiThemeProvider>
          <div>
            <AppBar
                title="Register"
            />
                <div className='row'>
                    <div className='col-md-4 offset-md-4'>
                        <TextField
                            hintText="Enter your full name"
                            floatingLabelText="Your full name"
                            onChange = {(event,newValue) => this.setState({name:newValue})}
                            />
                        <br/>
                        <TextField
                            hintText="Enter your Email"
                            type="email"
                            floatingLabelText="Your email"
                            onChange = {(event,newValue) => this.setState({email:newValue})}
                            />
                        <br/>
                        <TextField
                            type = "password"
                            hintText="Enter your Password"
                            floatingLabelText="Your password"
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
export default withRouter(Register);