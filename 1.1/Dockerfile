FROM alpeware/chrome-headless-trunk:rev-827595
RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
RUN apt-get -y install nodejs
RUN npm install
RUN npm -v
RUN rm -rf /var/lib/apt/lists/*
