import React from 'react';
import { render } from 'react-dom';


// import router, redux & store
import { Router, Route, IndexRoute, browserHistory } from 'react-router';
import { Provider } from 'react-redux';
import store, { history } from './store';

// import components
import App from './components/App';
import RoleSelect from './components/RoleSelect';
import Dashboard from './components/Dashboard';

const router = (
	<Provider store={store}>
		<Router history={history}>
			<Route path="/" component={App}>
				<IndexRoute component={RoleSelect}></IndexRoute>
				<Route path="/i-am-a/:roleSlug" component={Dashboard}></Route>
			</Route>
		</Router>
	</Provider>
)


render( router, document.getElementById('root') );