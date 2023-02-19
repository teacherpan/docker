FROM node:14.15.0-stretch
RUN apt update
RUN apt install -y chromium
RUN ls /usr/bin/
RUN export CHROME_BIN=/usr/bin/chromium
RUN apt install -y vim
RUN npm install -g @angular/cli@11.0.7
RUN apt clean