// test action
export function testAction(index) {
	console.log('action - test');
	return {
		type: 'TEST_ACTION',
		index	
	}
}