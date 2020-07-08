import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import * as serviceWorker from './serviceWorker';

const el = document.querySelector('#root');
if (el) {
    ReactDOM.render(< App />, document.getElementById('root'));
    if (process.env.ENV !== "production") {
        console.log('React app is running in development mode');
    }
}
// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();