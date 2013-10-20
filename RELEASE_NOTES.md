# October 2013 First Release

## Encodiing Issues

- There may be encoding issues in titles of previously saved items. These need a MANUAL check and MANUAL resolution from the backend.

## Database Changes

- ADD TWO COLUMNS to "VOLUME_ITEMS"
    name: "ABSTRACT_EN" AND "ABSTRACT_FR"
    type: "text"
    default: "null"
    Collation: "utf8_general_ci"
