#include <mpi.h>
#include <stdio.h>

int main(void) {
	MPI_Init(NULL, NULL);

	int world_rank;
	MPI_Comm_rank(MPI_COMM_WORLD, &world_rank);

	int world_size;
	MPI_Comm_size(MPI_COMM_WORLD, &world_size);

	// Send :
	// MPI_Send(&data, number, MPI_TYPE_DATA, destination, tag, MPI_COMMUNICATOR)
	
	// Receive :
	// MPI_Recv(&data, number, MPI_TYPE_DATA, source, tag, MPI_COMMUNICATIOR, &status)
	
	// World Rank Branching
	int n, i, j, k, l;
	double A[100][100];

	if(world_rank == 0) {
		// Data input value
		// Input n
		scanf("%d", &n);
	////////if(n != world_size) {
	////////	printf("World Size must equal to n");
	////////	MPI_Abort(MPI_COMM_WORLD, 1);
	////////}

		// Input matrices of (n x (n+1))
		for(i=0; i<n; i++) {
			for(j=0;j<n+1;j++) {
				scanf("%lf", &A[i][j]);	
			}

		}
		
		// Broadcast all row
		for(i=1;i<=n;i++) {
			MPI_Send(&n, 1, MPI_DOUBLE, i, 0, MPI_COMM_WORLD);
			for(j=0;j<n;j++) {
				MPI_Send(A[j], n+1, MPI_DOUBLE, i, 0, MPI_COMM_WORLD);
			}
		}



	} else {

		// Receive first row broadcast and n
		MPI_Recv(&n, 1, MPI_DOUBLE, 0, 0, MPI_COMM_WORLD, MPI_STATUS_IGNORE);
		for(i=0;i<n;i++) {
			MPI_Recv(A[i], n+1, MPI_DOUBLE, 0, 0, MPI_COMM_WORLD, MPI_STATUS_IGNORE);
		}

		
	}

	for(k=0;k<n-1;k++) {
		for(i=k+1;i<n;i++) {
			if(world_rank == i) {
				A[i][k] = A[i][k] / A[k][k];
				for(j=k+1;j<n+1;j++) {
					A[i][j] = A[i][j] - A[i][k] * A[k][j];
				}
			}
		}
		if(world_rank == k+1) {
			for(i=0;i<world_size;i++) {
				if(i != k+1) {
					MPI_Send(A[k+1], n+1, MPI_DOUBLE, i, 0, MPI_COMM_WORLD);
				}
			}
		} else {
			//printf("Receiving %d from %d\n", i, world_rank);
			MPI_Recv(A[k+1], n+1, MPI_DOUBLE, k+1, 0, MPI_COMM_WORLD, MPI_STATUS_IGNORE);
		}

	}

	if(world_rank == 0) {
		// Print the result
		for(i=0;i<n;i++) {
			for(j=0;j<n+1;j++) {
				printf("%2f ", A[i][j]);
			}
			printf("\n");
		}
	}
	MPI_Finalize();
	return 0;
}
