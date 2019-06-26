import React, { Component } from 'react';
import { BrowserRouter as Router } from 'react-router-dom';
import ReactDOM  from 'react-dom'
import Route from './Route'

class App extends Component {
  render() {
    return (
      <div className='container-fluid'>
            <Router>
                <Route/>
            </Router>
      </div>
    );
  }
}
const style = {
  margin: 15,
};
export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App/>, document.getElementById('app'));
}
