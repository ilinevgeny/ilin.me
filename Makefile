.PHONY: dev down

# Start the development environment using docker-compose
# Runs containers in the foreground so logs are visible
# Usage: make dev


dev:
	docker-compose up --build

# Stop containers started by `make dev`


down:
	docker-compose down
