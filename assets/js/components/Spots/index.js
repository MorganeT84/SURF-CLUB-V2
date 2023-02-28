import React from 'react';
import axios from 'axios';
import { useState, useEffect } from 'react';

import Card from 'react-bootstrap/Card';
import Spinner from 'react-bootstrap/Spinner';

export default function Spots() {

  const [spots, setSpots] = useState({});
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    axios({
      method: 'get',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      url: 'https://localhost:8000/admin/spot/list/member',
    })
      .then(function (response) {
        setSpots(response.data);
        //console.log(response.data);
        setIsLoading(false);
      })
      .catch(() => {
        setError(true);
        setIsLoading(false);
      });

  }, []);

  return (
    <div className='main'>
      <h1>Spots</h1>
      {isLoading ? (
        <Spinner animation="border" role="status">
          <span className="visually-hidden">Loading...</span>
        </Spinner>
      ) : (
        <div className='card-session'>
          {spots.map(spot =>
            <Card style={{ width: '18rem' }} key={spot.id}>
              <Card.Img variant="top" src="/images/bg-body.jpeg" />
              <Card.Body>
                <Card.Title>{spot.name}</Card.Title>
                <Card.Text>
                  {spot.place}
                </Card.Text>
              </Card.Body>
            </Card>
          )}
        </div>
      )}
    </div>
  )
};
