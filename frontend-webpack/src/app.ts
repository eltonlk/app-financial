import _ from 'lodash';
import './app.css';

function component() {
  const element = document.createElement('div');

  // Lodash, now imported by this script
  element.innerHTML = _.join(['Hello', 'webpack dasd dsadas'], ' ');
  element.classList.add('hello');

  return element;
}

document.body.appendChild(component());
