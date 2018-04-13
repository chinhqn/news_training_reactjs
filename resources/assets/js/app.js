require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, Switch } from 'react-router';
import createBrowserHistory from 'history/createBrowserHistory';
import CreateUser from './components/User/CreateUser';
import EditUser from './components/User/EditUser';
import UserList from './components/User/UserList';
const history = createBrowserHistory();
render(
    <Router history={history}>
        <Switch>
            <Route  path='/user/create' component={CreateUser}/>
            <Route  path='/user/edit/:id' component={EditUser}/>
            <Route  path='/' component={UserList}/>
        </Switch>
    </Router>,
    document.getElementById('root')
);
