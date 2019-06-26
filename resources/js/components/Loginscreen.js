import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import { Route, Link, BrowserRouter as Router } from 'react-router-dom'
import Login from './Login';
import Register from './Register';

class Loginscreen extends Component {
  constructor(props){
    super(props);
    this.state={
      username:'',
      password:'',
      loginscreen:[],
      loginmessage:'',
      buttonLabel:'Register',
      isLogin:true
    }
  }
  
  componentWillMount(){
    var loginscreen=[];
    loginscreen.push(<Login key={5} parentContext={this} appContext={this.props.parentContext}/>);
    var loginmessage = "Not registered yet, Register Now";
    this.setState({
                  loginscreen:loginscreen,
                  loginmessage:loginmessage
                    })
  }


  handleClick(event){
    let loginmessage;
    if(this.state.isLogin){
      var loginscreen=[];
      loginscreen.push(<Register key={1} parentContext={this}/>);
      loginmessage = "Already registered.Go to Login";
      this.setState({
                     loginscreen:loginscreen,
                     loginmessage:loginmessage,
                     buttonLabel:"Login",
                     isLogin:false
                   })
    }
    else{
      var loginscreen=[];
      loginscreen.push(<Login key={2} parentContext={this}/>);
      loginmessage = "Not Registered yet.Go to registration";
      this.setState({
            loginscreen:loginscreen,
            loginmessage:loginmessage,
            buttonLabel:"Register",
            isLogin:true
        })
    }
  }

  render() {
    return (
      <div>
            <div className='row'>{this.state.loginscreen}</div>
            <div className='row'>
                <div className='col-md-12'>
                    <div className='row'>
                        <div className='col-md-4 offset-md-4'>
                            {this.state.loginmessage}
                            
                            <MuiThemeProvider>
                                <div>
                                    <RaisedButton label={this.state.buttonLabel} primary={true} style={style} onClick={(event) => this.handleClick(event)}/>
                                </div>
                            </MuiThemeProvider>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    );
  }
}
const style = {
  margin: 15,
};
export default Loginscreen;