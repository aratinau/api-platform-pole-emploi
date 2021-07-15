# API Platform with Pole-Emploi API

Show how keep the hydra result and pagination an external API using `PaginatorInterface` and `IteratorAggregate`

## Install

Create `.env.local` file from template `.env` file

To get your Api's keys go to `https://pole-emploi.io/`

Set `POLE_EMPLOI_SECRET_KEY` and `POLE_EMPLOI_ID_KEY` variables

`composer install`

## Launch

`symfony serve --no-tls`

## Usae

`/api/pole_emplois?page=1&q=job_name`

# Result example

```json
{
    "@context": "/api/contexts/PoleEmploi",
    "@id": "/api/pole_emplois",
    "@type": "hydra:Collection",
    "hydra:member": [
        {
            "@id": "/api/pole_emplois/10944",
            "@type": "PoleEmploi",
            "code": "10944",
            "libelle": "Analyste développeur / développeuse",
            "libelleCourt": "Analyste développeur / développeuse",
            "particulier": false
        },
        {
            "@id": "/api/pole_emplois/14155",
            "@type": "PoleEmploi",
            "code": "14155",
            "libelle": "Développeur / Développeuse multimédia",
            "libelleCourt": "Développeur / Développeuse multimédia",
            "particulier": false
        }...
    ],
    "hydra:totalItems": 100,
    "hydra:view": {
        "@id": "/api/pole_emplois?q=dev&page=1",
        "@type": "hydra:PartialCollectionView",
        "hydra:first": "/api/pole_emplois?q=dev&page=1",
        "hydra:last": "/api/pole_emplois?q=dev&page=4",
        "hydra:next": "/api/pole_emplois?q=dev&page=2"
    }
}
```
