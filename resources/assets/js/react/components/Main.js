import React from 'react';

const Main = React.createClass({
	render() {
		return (
			<div className="main-container height-width-100">
				{React.cloneElement(this.props.children, this.props)}
			</div>
		)
	}
});

export default Main;