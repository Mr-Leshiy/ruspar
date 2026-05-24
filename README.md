# Quick start

## Start dev server

```bash
# Go to the root folder
cd ./new_website

# Run Docker container
docker compose up
```

## File transfer

```bash
# Go to the root foler
cd ./new_website

# Establish NCFTP connection and send the source code
ncftp -u <ftp_user_name> -p <ftp_password> ruspar.od.ua
cd www
put -R ./src
```

## Encoding

`WINDOWS-1251`
