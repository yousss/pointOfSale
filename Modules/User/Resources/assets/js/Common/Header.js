import React from 'react'
import { Link } from 'react-router'

const Header = () => (
    <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
    <div className='container'>
        <Link className='navbar-brand' to='/'>Role</Link>
    </div>
    </nav>
)

export default Header