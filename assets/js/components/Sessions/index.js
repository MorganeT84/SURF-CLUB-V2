import React from 'react';
import axios from 'axios';
import { useState, useEffect } from 'react';

import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Spinner from 'react-bootstrap/Spinner';

import { format } from 'date-fns';
import { fr } from 'date-fns/locale';

export default function Sessions() {

  const [sessions, setSessions] = useState({});
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    axios({
      method: 'get',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      url: 'https://localhost:8000/admin/session/list/member',
    })
      .then(function (response) {
        setSessions(response.data);
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
      <h1>Sessions</h1>

      {isLoading ? (
        <Spinner animation="border" role="status">
          <span className="visually-hidden">Loading...</span>
        </Spinner>
      ) : (
        <div className={'row'}>
          {sessions.map(session =>
            <Card className="text-center" style={{ width: '18rem' }} key={session.id}>
              <Card.Header>{session.category.name} / {session.spot.name}
                <Card.Title>
                  <time dateTime={session.dayTime}>{format(
                    new Date(session.dayTime),
                    `PPPP`, { locale: fr }
                  )}</time>
                </Card.Title>
                <Card.Title>
                  <time dateTime={session.dayTime}>{format(
                    new Date(session.dayTime),
                    `HH'h'mm `, { locale: fr }
                  )}</time>
                  à
                  <time dateTime={session.dayTimeEnd}>{format(
                    new Date(session.dayTimeEnd),
                    ` HH'h'mm `, { locale: fr }
                  )}</time>
                </Card.Title>
              </Card.Header>

              <Card.Body>
                <Card.Title>{session.title}</Card.Title>
                <Card.Img variant="top" src={session.picture} />
                <Card.Text>
                  <p>{session.description}</p>

                  <p>{session.spot.place}</p>
                </Card.Text>
                <Card.Text>
                  {session.numberOfPlace} personnes max
                </Card.Text>
                <Card.Text> 
                    {session.level.map(level =>
                      <p>{level.name}</p>
                    )} 
                  {session.level.name}
                </Card.Text>
              </Card.Body>
              <Card.Footer className="text-muted">
                <Button variant="primary">Réserver</Button>
              </Card.Footer>
            </Card>

          )}
        </div>
      )}
    </div>
  );
};
