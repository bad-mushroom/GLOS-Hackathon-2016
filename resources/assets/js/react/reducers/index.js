import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux';

import roleData from './roleData';

const rootReducer = combineReducers({roleData, routing: routerReducer});

export default rootReducer;