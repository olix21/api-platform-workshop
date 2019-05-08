import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/newsarticle/';

export default [
  <Route path='/news_articles/create' component={Create} exact={true} key='create'/>,
  <Route path='/news_articles/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/news_articles/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/news_articles/:page?' component={List} strict={true} key='list'/>,
];
