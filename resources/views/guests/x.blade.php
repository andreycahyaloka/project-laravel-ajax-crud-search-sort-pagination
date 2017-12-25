								<tbody>
									@php
										$number = 1;
									@endphp
									@foreach($posts as $post)
										<tr>
											<th style="min-width:50px;">{{ $number++ }}</th>
											<td style="min-width:150px;">{{ $post->title }}</td>
											<td style="min-width:250px;">{{ $post->body }}</td>
											<td style="min-width:125px;">
												{{ date('M j, Y', strtotime($post->created_at)) }}<br />
												{{ date('h:i A', strtotime($post->created_at)) }}
											</td>
											<td style="min-width:125px;">
												{{ date('M j, Y', strtotime($post->updated_at)) }}<br />
												{{ date('h:i A', strtotime($post->updated_at)) }}
											</td>
											<td class="text-center" style="min-width:300px;">
												<div class="form-row">
													<div class="form-group col-md-4">
														{!! Form::open([
															'route' => ['guest.index'],
															'method' => 'GET',
															])
														!!}
															{{ Form::submit('View', [
																	'class' => 'btn btn-outline-info btn-block btn-sm',
																])
															}}
														{!! Form::close() !!}
													</div>
													<div class="form-group col-md-4">
														{{ Form::button('Edit', [
																'class' => 'btn btn-outline-primary btn-block btn-sm'
															])
														}}
													</div>
													<div class="form-group col-md-4">
														{{ Form::button('Delete', [
																'class' => 'btn btn-outline-danger btn-block btn-sm'
															])
														}}
													</div>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>








								<h6 class="card-subtitle mb-2 text-muted">
								{{ $posts->total() }} Post(s) ({{ $posts->lastItem() }} of {{ $posts->total() }})
							</h6>