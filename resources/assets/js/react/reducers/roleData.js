function roleData(state = [], action) {
	let newState = state;
	switch(action.type) {
		case 'TEST_ACTION':
		console.log('this was just a test');
		return newState;
	}
	return newState;
}

export default roleData;