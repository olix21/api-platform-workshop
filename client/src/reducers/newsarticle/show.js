import { combineReducers } from 'redux'

export function error(state = null, action) {
  switch (action.type) {
    case 'NEWSARTICLE_SHOW_ERROR':
      return action.error;

    case 'NEWSARTICLE_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function loading(state = false, action) {
  switch (action.type) {
    case 'NEWSARTICLE_SHOW_LOADING':
      return action.loading;

    case 'NEWSARTICLE_SHOW_RESET':
      return false;

    default:
      return state;
  }
}

export function retrieved(state = null, action) {
  switch (action.type) {
    case 'NEWSARTICLE_SHOW_RETRIEVED_SUCCESS':
      return action.retrieved;

    case 'NEWSARTICLE_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export default combineReducers({error, loading, retrieved});
