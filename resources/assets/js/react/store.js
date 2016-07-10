import { createStore, compose} from 'redux';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory} from 'react-router';

// import the root reducer
import rootReducer from './reducers/index';

import roleData from './data/roleData';


// create an object for the default data
const defaultState = {
	roleData,
};

const store = createStore(rootReducer, defaultState, compose(
		window.devToolsExtension ? window.devToolsExtension() : f => f
	));

export const history = syncHistoryWithStore(browserHistory, store);

export default store;