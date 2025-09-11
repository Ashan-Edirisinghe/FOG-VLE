require('./bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';
import FinalSubmission from './components/FinalSubmission';

// Initialize React components
if (document.getElementById('final-submission')) {
    ReactDOM.render(
        <FinalSubmission />,
        document.getElementById('final-submission')
    );
}
