FROM node:12

USER node
RUN mkdir -p /home/node/base-react-laravel/app
WORKDIR /home/node/base-react-laravel/app

COPY --chown=node:node ./app/package*.json .
COPY --chown=node:node ./app/yarn.lock .

RUN yarn --pure-lockfile

COPY --chown=node:node . .

EXPOSE 3000

CMD ["yarn", "start"]