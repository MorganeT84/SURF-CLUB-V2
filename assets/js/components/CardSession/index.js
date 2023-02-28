import React from 'react';
import axios from 'axios';
import { useState, useEffect } from 'react';

import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Spinner from 'react-bootstrap/Spinner';

import './card.scss';

export const CardSession = () => {

  const [categories, setCategories] = useState({});
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    axios({
      method: 'get',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      url: 'https://localhost:8000/admin/category/list/member',
    })
      .then(function (response) {
        setCategories(response.data);
        //console.log(response.data);
        setIsLoading(false);
      })
      .catch(() => {
        setError(true);
        setIsLoading(false);
      });

  }, []);

  return (
    <>
      {isLoading ? (
        <Spinner animation="border" role="status">
          <span className="visually-hidden">Loading...</span>
        </Spinner>
      ) : (
        <div className='card-session'>
          {categories.map(category =>
            <Card key={category.id}>
              <Card.Body>
                <Card.Title>{category.name}</Card.Title>
                <Card.Img variant="top" src="/images/bg-body.jpeg" />
                <Button variant="primary">Link Go it!</Button>
              </Card.Body>
            </Card>
          )}
        </div>
      )}
    </>


  )
}

